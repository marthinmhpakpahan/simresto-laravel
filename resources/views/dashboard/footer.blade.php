    <footer class="footer pt-3 fixed-bottom mb-2">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        made with <i class="fa fa-heart"></i> by
                        <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                        for a better web.
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative
                                Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                target="_blank">About
                                Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                target="_blank">License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script>
        $(document).ready(function() {
            console.log("READY");
            $('input[name=photo], input[name=identity_card]').change(function(event) {
                console.log("showSelectedImage");
                var image_element = $(this).data("img_element");
                var files = event.target.files;
                if (event.target.files) {
                    // FileReader support
                    if (FileReader && files && files.length) {
                        var fr = new FileReader();
                        fr.onload = function() {
                            $('#' + image_element).attr("src", fr.result);
                            $('#' + image_element).attr("height", 450);
                            $('#' + image_element).removeClass("visually-hidden");
                        }
                        fr.readAsDataURL(files[0]);
                    }
                } else {
                    console.log("No image uploaded");
                }
            });

            function getBase64(file, id) {
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function() {
                    $(id).attr("src", reader.result);
                    $(id).attr("height", 80);
                    $(id).attr("width", 100);
                    $(id).removeClass("visually-hidden");
                };
                reader.onerror = function(error) {
                    console.log('Error: ', error);
                };
            }

            $('input[name=image-multiple]').change(function(event) {
                console.log("showSelectedMultipleImage");
                var files = event.target.files;
                for (var i = 0; i < event.target.files.length; i++) {
                    console.log("BEFORE");
                    var imageBase64 = getBase64(files[i], '#img_photo_' + (i+1));
                    console.log($('#img_photo_' + (i+1)));
                }
                if(files.length > 0) {
                    $("#div_img_photo").removeClass("visually-hidden");
                }
            });
        });
    </script>
    </main>
    @include('common.footer')
