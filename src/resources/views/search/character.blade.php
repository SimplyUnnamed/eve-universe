
@include('eveuniverse::search.search', ['type'=>'character', 'label'=>"Character Search"])


@push('javascript')

    <script type="text/javascript">

        $(document).ready(function(){

            {{ isset($modal) ? eu_select2_modal($class ?? ".character-search", 'character', $modal) : eu_select2($class ?? ".character-search", 'corporation') }}

        })

    </script>

@endpush