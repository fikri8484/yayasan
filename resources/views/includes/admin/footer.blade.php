<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <?php 
                $year = \Carbon\Carbon::now('Asia/Jakarta')->format('Y');
                ?>
                {{ $year }} &copy; SedekahJariah
            </div>
        </div>
    </div>
</footer>