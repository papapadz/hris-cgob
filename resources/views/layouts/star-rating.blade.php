@section('css')
<style>
  .star-rating {
    line-height:32px;
    font-size:1.25em;
  }
  
  .star-rating .fa-star{color:gold;}
  
  </style>
@endsection

<div class="modal fade" id="starModal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="ratingForm">
          @csrf
          <div class="row">
            <div class="col-md-4">
              <label>Quality</label>
            </div>
            <div class="col-md-4">
              <div class="star-rating star1" id="star1" >
                <span class="star fas fa-star" data-rating="1"></span>
                <span class="star fas fa-star" data-rating="2"></span>
                <span class="star fas fa-star" data-rating="3"></span>
                <span class="star fas fa-star" data-rating="4"></span>
                <span class="star fas fa-star" data-rating="5"></span>
                <input type="hidden" name="quality" class="rating-value" value="1">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label>Effectiveness</label>
            </div>
            <div class="col-md-4">
              <div class="star-rating star2" id="star2">
                <span class="star fas fa-star" data-rating="1"></span>
                <span class="star fas fa-star" data-rating="2"></span>
                <span class="star fas fa-star" data-rating="3"></span>
                <span class="star fas fa-star" data-rating="4"></span>
                <span class="star fas fa-star" data-rating="5"></span>
                <input type="hidden" name="effectiveness" class="rating-value" value="1">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <label>Timeliness</label>
            </div>
            <div class="col-md-4">
              <div class="star-rating star3" id="star3" >
                <span class="star fas fa-star" data-rating="1"></span>
                <span class="star fas fa-star" data-rating="2"></span>
                <span class="star fas fa-star" data-rating="3"></span>
                <span class="star fas fa-star" data-rating="4"></span>
                <span class="star fas fa-star" data-rating="5"></span>
                <input type="hidden" name="timeliness" class="rating-value" value="1">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <label>Remarks</label>
              <textarea class="form-control" name="remarks"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-rating">Save changes</button>
      </div>
    </div>
  </div>
</div>
