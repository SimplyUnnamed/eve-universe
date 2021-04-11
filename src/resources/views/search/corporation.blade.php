
@include('eveuniverse::search.search', ['type'=>'corporation','label'=>"Corporation Search","id"=> isset($id) ? $id : ""])


@push('javascript')

    <script type="text/javascript">
        $(document).ready(function(){
            {{ isset($modal) ? eu_select2_modal($class ?? ".corporation-search", 'corporation', $modal) : eu_select2($class ?? ".corporation-search", 'corporation') }}
        })
    </script>

@endpush