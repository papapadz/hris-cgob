<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Str;
use DB;
use Illuminate\Http\Request;
use App\Models\Barangay;
use App\Models\Town;
use App\Models\Province;
use App\Models\Plantilla;
use App\Models\EmployeeWorkExperience;
 
class AjaxController extends Controller
{
    public function getAddress(Request $request) {

        switch($request->flag) {
            case 2: return Town::where('province_id',$request->id)->orderBy('town')->get(); break;
            case 3: return Barangay::where('town_id',$request->id)->orderBy('barangay')->get(); break;
        }
    }

    public function getPlantilla(Request $request) {
        return Plantilla::where('position_id',$request->id)->orderBy('plantilla')->get();
    }

    public function generateFields(Request $request) {

        $model = getModelInstance($request->index);
        $fields = $model->getFillable();
        $table = $model->getTable();
        $form = '<form id="'.$request->formname.'"><input type="hidden" name="_token" value="'.csrf_token().'"><input type="hidden" name="index" value="'.$request->index.'">';

        //if($table=='')

        foreach($fields as $field) {
            if($this->removeFields($field)) {
                if($field=='emp_id')
                    $form .= '<input type="hidden" name="emp_id" value="'.$request->emp_id.'">';
                else
                    $form .= $this->getHTMLElement(
                        $field,
                        DB::getSchemaBuilder()->getColumnType($table, $field)
                    );
            }
        }
        return $form.'</form>';
    }

    public function removeFields($name) {
        $removables = array('level','sl','vl','status','numdays');
        foreach($removables as $remove) {
            if($remove==$name)
                return false;
        }
        return true;
    }

    public function getHTMLElement($name,$type) {
        
        $removable = ['_','id','date','type','is','year','url'];
        $field = '<label>'.Str::title(str_replace($removable,'',$name)).'</label>';
        switch($type) {
            case 'string': 
                if (strpos($name, 'url') !== false)
                    $field .= '<input class="form-control" type="file" name="'.$name.'">';
                else
                    $field .= '<input class="form-control" type="text" name="'.$name.'">';
                break;
            case 'bigint':
                    $field .= '<select class="form-control generated-form-select" name="'.$name.'">';
                    $field .= $this->elementsWithSelect($name).'</select>';
                break;
            case 'boolean':
                $field .= '<div class="form-check"><input class="form-check-input" type="radio" name="'.$name.'" value=true checked><label class="form-check-label">Yes</label></div>';
                $field .= '<div class="form-check"><input class="form-check-input" type="radio" name="'.$name.'" value=false><label class="form-check-label">No</label></div>';
                break;
            case 'integer':
                $field .= '<input class="form-control" type="number" name="'.$name.'">';
                break;
            case 'double':
                $field .= '<input class="form-control" type="number" step="0.01" name="'.$name.'">';
                break;
            case 'decimal':
                $field .= '<input class="form-control" type="number" step="0.01" name="'.$name.'">';
                break;
            case 'date':
                $field .= '<input class="form-control" type="date" name="'.$name.'">';
                break;
            case 'time':
                $field .= '<input class="form-control" type="time" name="'.$name.'">';
                break;
        }

        return '<div class="form-row"><div class="col-12">'.$field.'</div></div>';
    }

    public function elementsWithSelect($fieldname) {
        $fields = array(
            ['field'=>'plantilla_id','table'=>'plantilla','text'=>'plantilla'],
            ['field'=>'ratingtype_id','table'=>'applicant_rating_types','text'=>'ratingtype'],
            ['field'=>'employmenttype_id','table'=>'employment_types','text'=>'employmenttype'],
            ['field'=>'appointmenttype_id','table'=>'appointment_types','text'=>'appointmenttype'],
            ['field'=>'department_id','table'=>'departments','text'=>'department'],
            ['field'=>'province_id','table'=>'provinces','text'=>'province'],
            ['field'=>'town_id','table'=>'towns','text'=>'town'],
            ['field'=>'address_id','table'=>'barangays','text'=>'barangay'],
            ['field'=>'civilstat_id','table'=>'civil_status','text'=>'civil_status'],
            ['field'=>'citizenship_id','table'=>'citizenships','text'=>'citizenship'],
            ['field'=>'eligibilitytype_id','table'=>'eligibility_types','text'=>'eligibility'],
            ['field'=>'workaddress_id','table'=>'barangays','text'=>'barangay'],
            ['field'=>'leavetype_id','table'=>'leave_types','text'=>'leavetype'],
            ['field'=>'license_id','table'=>'licenses','text'=>'agency'],
            ['field'=>'payrollitem_id','table'=>'payroll_items','text'=>'payrollitem'],
            ['field'=>'trainingtype_id','table'=>'training_types','text'=>'trainingtype'],
            ['field'=>'position_id','table'=>'positions','text'=>'position'],
            ['field'=>'school_id','table'=>'schools','text'=>'school'],
            ['field'=>'course_id','table'=>'courses','text'=>'course'],
        );

        $options = null;

        foreach($fields as $field) {
            if($field['field']==$fieldname) {

                $data = json_decode(DB::table($field['table'])->orderBy($field['text'])->get(),true);
                foreach($data as $d) {
                    $options .= '<option value="'.$d['id'].'">'.$d[$field['text']].'</option>';
                }
                break;
            }
        }

        return $options;
    }

    public function saveFormData(Request $request) {
        $model = getModelInstance($request->index);
        $model->create($request->all());

        return 1;
    }
}
