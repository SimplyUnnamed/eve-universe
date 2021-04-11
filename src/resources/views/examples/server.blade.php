<div class="card">
    <div class="card-header">
        <h3 class="card-title">Server Side Render Example</h3>
    </div>
    <div class="card-body">

        <button class="btn btn-primary"
                data-toggle="modal"
                data-target="#server-example"
                data-url="{{ route('eveuniverse.exampleform') }}">Open Modal</button>

    </div>
</div>

<div id="server-example" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@push('javascript')

    <script type="text/javascript">

        $(document).ready(function(){
            $('#server-example').on('show.bs.modal', function (e) {
                var body = $(e.target).find('.modal-body');
                body.html('Loading...');

                $.ajax($(e.relatedTarget).data('url'))
                    .done(function (data) {
                        body.html(data);
                        $(document).find('span[data-toggle="tooltip"]').tooltip();
                        //now we need to initiate the select 2

                        {{ eu_select2_modal('server-character', 'character', '#server-example') }}

                        {{ eu_select2_modal('server-alliance', 'alliance', '#server-example') }}

                        {{ eu_select2_modal('server-corporation', 'corporation', '#server-example') }}

                        {{ eu_select2_modal('server-faction', 'faction', '#server-example') }}

                    });
            });

            $('#server-example').on('hide.bs.modal', function (e) {
                //Need to destroy the select2 on close

                {{eu_select2_destroy('server-character')}}
                        {{eu_select2_destroy('server-alliance')}}
                        {{eu_select2_destroy('server-corporation')}}
                        {{eu_select2_destroy('server-faction')}}
            })
        })
    </script>

@endpush