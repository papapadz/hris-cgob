<style>
    .star-rating {
      line-height:32px;
      font-size:1.25em;
    }
    
    .star-rating .fa-star{color:gold;}
    
    </style>
<table class="table table-responsive-sm table-striped">
    <thead>
      <tr>
        @if(!isset($employee))
        <th>Employee ID</th>
        <th>Name</th>
        @endif
        <th>Function</th>
        <th>MFO</th>
        <th>Target</th>
        <th>Accomplishment</th>
        <th>Q</th>
        <th>E</th>
        <th>T</th>
        <th>A</th>
        <th>Remarks</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($ipcrs as $ipcr)
        <tr>
        @if(!isset($employee))
          <td><strong>{{ $employee->emp_id }}</strong></td>
          <td>{{ getEmployeeName($employee->emp_id) }}</td>
        @endif
          <td>{{ $ipcr->mfo->functiontype->type }}</td>
          <td>{{ $ipcr->mfo->mfo }}</td>
          <td>{{ $ipcr->target }}</td>
          <td>{{ $ipcr->accomplishment }}</td>
          @if(count($ipcr->ratings)>0)
            @foreach($ipcr->ratings as $rating)
                <td>{{ $rating->quality }}</td>
                <td>{{ $rating->effectiveness }}</td>
                <td>{{ $rating->timeliness }}</td>
                <td>{{ number_format(array_sum(array($rating->quality,$rating->effectiveness,$rating->timeliness))/3,2) }}</td>
                <td>{{ $rating->remarks }}</td>
            @endforeach
          @else
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          @endif
           <td>
            <div class="btn-group flex-wrap" data-toggle="buttons">
                <button type="button" class="btn btn-sm btn-success" onclick="updateipcr('ipcr_add_accomplishment',{{ $ipcr->id }})"><i class="fa fa-plus"></i></button>
                <button type="button" class="btn btn-sm btn-warning" onclick="updateipcr('ipcr_rate_accomplishment',{{ $ipcr->id }})"><i class="fa fa-star"></i></button>
                <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
            </div>
           </td>
          {{-- <td>
            <form action="{{ route('appointments.destroy', $ipcr->id ) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-block btn-danger">Delete</button>
            </form>
          </td> --}}
        </tr>
      @endforeach
    </tbody>
  </table>

@section('javascript')
<script>
  
  $('table').DataTable()
    var ipcr_id = null
    var ratinglists = ['quality','effectiveness','timeliness']
    // var $star_rating = $('.star-rating1 .star');
    
    //     var SetRatingStar = function() {
    //       return $star_rating.each(function() {
    //           if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
    //             return $(this).removeClass('far fa-star').addClass('fas fa-star');
    //             } else {
    //               return $(this).removeClass('fas fa-star').addClass('far fa-star');
    //             }
    //         });
    //     };
    
    //     $star_rating.on('click', function() {
    //         console.log($(this))
    //       $star_rating.siblings('input.rating-value').val($(this).data('rating'));
    //       return SetRatingStar();
    //     });
    
    // SetRatingStar();
    
    
    function updateipcr(flag,id) {
    
        ipcr_id = id
    
        if(flag=='ipcr_rate_accomplishment') {
            // $('#myModal-body').empty()
            // ratinglists.forEach(plotRatingLists);
            // function plotRatingLists(item, index) {
            //     $('#myModal-body').append(
            //                 '<div class="star-rating">'+
            //                     '<span class="star fas fa-star" data-rating="1"></span>'+
            //                     '<span class="star fas fa-star" data-rating="2"></span>'+
            //                     '<span class="star fas fa-star" data-rating="3"></span>'+
            //                     '<span class="star fas fa-star" data-rating="4"></span>'+
            //                     '<span class="star fas fa-star" data-rating="5"></span>'+
            //                     '<input type="hidden" name="'+item+'" class="rating-value" value="1">'+
            //                 '</div>'
            //             )
            // }
            $('#starModal').modal('show')
        } else {
            $.ajax({
                method: "GET",
                url: "{{ url('ajax/generate/modal/fields') }}",
                data: { 
                    emp_id: '{{ $employee->emp_id }}',
                    index: flag,
                    formname: 'myGeneratedForm'
                }
            }).done(function( response ) {
                $('#myModal-body').empty()
                $('#myModal-body').append(response)
                $('#myModal').modal('show')
                $('.generated-form-select').select2({
                    theme: 'bootstrap4'
                })
                $('#leavedays').datepicker({
                    multidate: true
                });
            })
        }
    }
    
    $('#save-generated-form').on('click',function() {
            var formData = new FormData( document.getElementById('myGeneratedForm') )
            formData.append('id', ipcr_id)
    
            $.ajax({
                    method: "POST",
                    url: "{{ url('ipcr/ajax/add/accomplishment') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                }).done(function( response ) {
                    $('#myModal').modal('hide')
                    console.log(response)
                    if(response==1) {
                        fireAlert('success','Changes have been saved!')
                        setInterval(function(){ 
                            window.location.reload()
                        }, 1000)
                    }
                    else
                        fireAlert('danger','An error has occured!')
                    
            })
        })

        $('#save-rating').on('click',function() {
            var formData = new FormData( document.getElementById('ratingForm') )
            formData.append('emp_id','{{ Auth::user()->emp_id }}')
            formData.append('id',ipcr_id)
    
            $.ajax({
                    method: "POST",
                    url: "{{ url('ipcr/ajax/add/rating') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                }).done(function( response ) {
                    $('#starModal').modal('hide')
                    console.log(response)
                    if(response==1) {
                        fireAlert('success','Changes have been saved!')
                        setInterval(function(){ 
                            window.location.reload()
                        }, 1000)
                    }
                    else
                        fireAlert('danger','An error has occured!')
                    
            })
        })
    </script>
    
<script>
    var $star_rating = $('.star-rating .star');

    var SetRatingStar = function() {
      return $star_rating.each(function() {
          if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
            return $(this).removeClass('far fa-star').addClass('fas fa-star');
            } else {
              return $(this).removeClass('fas fa-star').addClass('far fa-star');
            }
        });
    };

    $star_rating.on('click', function() {
        var star_id = $(this).parent().attr('id')
        $star_rating = $('.'+star_id+' .star')
      $star_rating.siblings('input.rating-value').val($(this).data('rating'));
      return SetRatingStar();
    });

SetRatingStar();
</script>
@endsection