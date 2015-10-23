<div class="modal fade view-profile-{{ $id }}">
    <div class="modal-dialog modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Profile: {{$name}} </h4>
        </div>
        <div class="modal-body">
            <h3 style="display:inline;vertical-align:middle;"><span class="label label-primary">Rating: {{$rating}}</span></h3>
        </div>
        <div class="modal-body">
            <h4>Price per hour</h4>
            ${{$price}}
        </div>
        <div class="modal-body">
            <h4>Description</h4>
            {{$description}}
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-primary">Close</button>
        </div>
    </div>
</div>