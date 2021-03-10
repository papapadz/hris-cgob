<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LeaveType;

class LeaveTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['is_leave'=>1,'plus_minus'=>0,'leave_credit'=>'vl','leavetype'=>'Vacation Leave','maxvalue'=>0,'description'=>'Granted to employee for personal reasons, the approval of which is contingent upon the necessities of the service'],
            ['is_leave'=>1,'plus_minus'=>0,'leave_credit'=>'sl','leavetype'=>'Sick Leave','maxvalue'=>0,'description'=>'Granted on account of sickness or disability of the employees or any member of their family (parents, siblings, children, spouse and even house helpers who are living with the employee)'],
            ['is_leave'=>1,'plus_minus'=>0,'leave_credit'=>'vl','leavetype'=>'Forced Leave','maxvalue'=>5,'description'=>'Employees with 10 days or more vacation leave shall be required to go on vacation leave whether continuous or intermittent for a minimum of 5 working days annually'],
            ['is_leave'=>1,'plus_minus'=>0,'leave_credit'=>'na','leavetype'=>'Special Priveledged Leave','maxvalue'=>3,'description'=>'Leave of Absence which may be availed of for a maximum of 3 days annually to mark special milestones and/or attend filial and domestic emergencies such as birthdays, anniversary, mourning, PTA meeting'],
            ['is_leave'=>1,'plus_minus'=>0,'leave_credit'=>'na','leavetype'=>'Maternity Leave','maxvalue'=>120,'description'=>'Every woman in the government service who has rendered an aggregate of 2 or more years of service, shall in addition to the vacation leave and sick leave granted to her, she will be entitled to maternity leave'],
            ['is_leave'=>1,'plus_minus'=>0,'leave_credit'=>'vl','leavetype'=>'Extended Maternity Leave','maxvalue'=>30,'description'=>'Additional Maternity Leave for 30 days without pay'],
            ['is_leave'=>1,'plus_minus'=>0,'leave_credit'=>'na','leavetype'=>'Paternity Leave','maxvalue'=>7,'description'=>'Every married male employee is entitled to paternity leave of 7 working days for each of the first 4 deliveries of his legitimate wife'],
            ['is_leave'=>1,'plus_minus'=>0,'leave_credit'=>'na','leavetype'=>'Solo Parent Leave','maxvalue'=>7,'description'=>'7 days leave of absence granted to a parent who has the sole custody and responsibility of the child and who has rendered at least 1 year of service regardless of employment status'],
            ['is_leave'=>1,'plus_minus'=>0,'leave_credit'=>'na','leavetype'=>'Rehabilitation Leave','maxvalue'=>180,'description'=>'Granted to employees for disability on account of injuries sustained while in the performance of duty'],
            ['is_leave'=>1,'plus_minus'=>0,'leave_credit'=>'na','leavetype'=>'Violence Against Women and their Children Act of 2004','maxvalue'=>10,'description'=>'Any woman employee in the government service, regardless of employment status and/or whose child is a victim of violence and whose age is below 18 or above 18 but unable to care of oneself is entitled'],
            ['is_leave'=>1,'plus_minus'=>0,'leave_credit'=>'na','leavetype'=>'Magna Carta for Women','maxvalue'=>60,'description'=>'Any female employee shall be entitled to special leave of a maximum of 2 months with full pay based on her gross monthly compensation, provided she has rendered at least 6 months aggregate service'],
            ['is_leave'=>1,'plus_minus'=>0,'leave_credit'=>'na','leavetype'=>'Study Leave','maxvalue'=>60,'description'=>'A time-off work not exceeding 6 months with pay for the purpose of assisting qualified employees to prepare for their bar or board examinations to complete their master\'s degree.'],
            ['is_leave'=>1,'plus_minus'=>0,'leave_credit'=>'all','leavetype'=>'Terminal Leave','maxvalue'=>0,'description'=>'Refers to the money value of the total accumulated leave credits of an employee based on the highest salary rate prior to or upon retirement date/voluntary separation'],
            ['is_leave'=>1,'plus_minus'=>0,'leave_credit'=>'na','leavetype'=>'Relocation Leave Leave','maxvalue'=>0,'description'=>'Refers to special privilege leave granted to employee/s whenever he/she transfers residence'],
            ['is_leave'=>0,'plus_minus'=>1,'leave_credit'=>'na','leavetype'=>'Monthly Increment','maxvalue'=>1.25,'description'=>'Monthly addition of Leave Credits'],
            ['is_leave'=>0,'plus_minus'=>0,'leave_credit'=>'vl','leavetype'=>'Unused Forced Leave','maxvalue'=>5,'description'=>'Deduction of unused leave credits'],
            ['is_leave'=>0,'plus_minus'=>0,'leave_credit'=>'vl','leavetype'=>'Late/Undertime','maxvalue'=>0,'description'=>'Deduction of leave credits to VL for Late and Undertime'],
            ['is_leave'=>0,'plus_minus'=>1,'leave_credit'=>'any','leavetype'=>'Cancel Leave','maxvalue'=>0,'description'=>'Cancel Leave'],
            ['is_leave'=>0,'plus_minus'=>1,'leave_credit'=>'all','leavetype'=>'Initial Leave Credits','maxvalue'=>0,'description'=>'DInitial Leave Credits'],
        );
       
        foreach($data as $d) {
            LeaveType::create([
                'is_leave'=>$d['is_leave'],
                'plus_minus'=>$d['plus_minus'],
                'leave_credit'=>$d['leave_credit'],
                'leavetype'=>$d['leavetype'],
                'maxvalue'=>$d['maxvalue'],
                'description'=>$d['description']
            ]);
        }
    }
}
