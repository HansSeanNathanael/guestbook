<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container " style="height: 100vh;">
            <div class="row align-items-center h-100 d-flex justify-content-center">
                <div class="col-md-4">
                    <form id="form-login" method="post" action="/login">
                        @csrf
                        <p class="fs-4 fw-bold text-dark text-center">
                            Buku Tamu
                        </p>

                        <!-- Input nama -->
                        <div class="form-outline mb-4">
                            <label class="form-label primary-font" for="input-username">Username</label>
                            <input type="text" name="username" id="input-username" class="form-control required" placeholder="username"/>
                        </div>
                    
                        <!-- Input password -->
                        <div class="form-outline mb-4">
                            <label class="form-label primary-font" for="input-password">Password</label>
                            <input type="password" name="password" id="input-password" class="form-control required" placeholder="password"/>
                        </div>
                    
                        <!-- Submit button -->
                        <div class="col d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary btn-block mb-4">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>