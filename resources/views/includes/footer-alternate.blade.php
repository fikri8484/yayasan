<footer id="footer" class="footer-top-border bg-color-light-scale-1">
    <div class="footer-copyright bg-color-light-scale-1">
        <div class="container py-2">
            <div class="row py-4">
                <div class="col d-flex align-items-center justify-content-center">
                    <?php 
                    $year = \Carbon\Carbon::now('Asia/Jakarta')->format('Y');
                    ?>
                    <p>
                        <strong>SedekahJariah</strong>© Copyright {{ $year }}. All Rights
                        Reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>