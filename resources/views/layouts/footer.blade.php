        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="{{ asset('design/js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('design/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <script type="text/javascript">
        var url="{{route('like')}}";
        var token="{{Session::token()}}";
        var durl="{{route('dislike')}}";
    </script>
</body>

</html>