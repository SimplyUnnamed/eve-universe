
@include('eveuniverse::search.search', ['type'=>'faction', 'label'=>"Faction Search"])


@push('javascript')

    <script type="text/javascript">

        $(document).ready(function(){

            {{ isset($modal) ? eu_select2_modal($class ?? ".faction-search", 'faction', $modal) : eu_select2($class ?? ".faction-search", 'faction') }}

        })

    </script>

@endpush