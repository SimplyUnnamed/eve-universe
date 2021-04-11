<div class="card">
    <div class="card-header">
        <h3 class="card-title">Modal Use</h3>
    </div>
    <div class="card-body">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-example">Open Modal</button>

    </div>
</div>

<div id="modal-example" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('eveuniverse::search.character', ['class'=>'modal-character', 'modal'=>'#modal-example'])

                @include('eveuniverse::search.alliance', ['class'=>'modal-alliance', 'modal'=>'#modal-example'])

                @include('eveuniverse::search.corporation', ['class'=>'modal-corporation', 'modal'=>'#modal-example'])

                @include('eveuniverse::search.faction', ['class'=>'modal-faction', 'modal'=>'#modal-example'])
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
