</div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright text-center">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.satoshibot.com">Satoshi Bot</a>
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>



    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?version=1.0.3"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js?version=1.0.10"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	//satoshi.initChartist();
        	satoshi.initRateChart();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Satoshi BOT</b> - your friendly coins.ph BOT."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

</html>
