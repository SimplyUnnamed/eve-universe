
@include('eveuniverse::search.search', ['type'=>'alliance', 'label'=>"Alliance Search"])


@push('javascript')

    <script type="text/javascript">

        $(document).ready(function(){

            {{ isset($modal) ? eu_select2_modal($class ?? ".alliance-search", 'alliance', $modal) : eu_select2($class ?? ".alliance-search", 'alliance') }}

        })

    </script>

@endpush