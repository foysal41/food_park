<script>
    /**  Load Produt Model  **/

    function loadProductModel(productId){
        $.ajax({
            method: 'GET',
            url: '{{ route("load-product-modal", ":productId") }}' . replace(':productId' , productId),
            success: function(response){
                //console.log(response); check করে দেখলাম
            },
            error: function(xhr, status, error){
                console.error(error);
            }
        });
    }
</script>
