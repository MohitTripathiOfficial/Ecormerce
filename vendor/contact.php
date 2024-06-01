<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include 'authguard.php'; ?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="mb-4 text-center">Contact Us</h1>
                <p class="text-center">If you have any questions, comments, or concerns, please feel free to reach out to us. We are here to help and look forward to hearing from you.</p>
            </div>
        </div>
        <div class="row mt-5 justify-content-center">
            <div class="col-md-5">
                <h3 class="text-center">Contact Information</h3>
                <p><strong>Address:</strong> 73/554, Central Plaza, Jhalwa, Uttar Pradesh, 211001, India</p>
                <p><strong>Email:</strong> mohittripathiofficial@gmail.com</p>
                <p><strong>Phone:</strong> +91 7505277616</p>
            </div>
            <div class="col-md-5 p-4">
                <h3 class="text-center">Send Us a Message</h3>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Send Message</button>
                </form>
            </div>
        </div>
    </div>

    <?php include '../shared/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+3Gk5aK5J5mSk1ADrMVRgkg9eT21D" crossorigin="anonymous"></script>
</body>

</html>