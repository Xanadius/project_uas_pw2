<script src="{{ asset('/admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/admin/vendor/popper.js/umd/popper.min.js') }}"></script>
<script src="{{ asset('/admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/admin/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
<script src="{{ asset('/admin/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('/admin/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('/admin/js/charts-home.js') }}"></script>
<script src="{{ asset('/admin/js/front.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    function confirmation(event) {
        event.preventDefault();

        var urlToRedirect = event.currentTarget.getAttribute('href');

        swal({
                title: "Are You Sure You Want to Delete This Data?",
                text: "Your data will permanently deleted.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })

            .then((WillCancel) => {
                if (WillCancel) {
                    window.location.href = urlToRedirect;
                }
            });
    }
</script>

<script>
    function openModal(show) {
        document.getElementById('modal').classList.toggle('hidden', !show);
        document.getElementById('modal-bg').classList.toggle('hidden', !show);
    }
</script>
