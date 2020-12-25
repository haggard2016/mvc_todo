<main class="form-signin">
    <form class="login" method="post">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        <label for="inputLogin" class="visually-hidden">Login</label>
        <input type="text" id="inputLogin" name="inputLogin" class="form-control" placeholder="Your login" required autofocus>
        <label for="inputPassword" class="visually-hidden">Password</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
    <div class="toast d-flex align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
            Wrong login or password.
        </div>
        <button type="button" class="btn-close btn-close-white ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</main>