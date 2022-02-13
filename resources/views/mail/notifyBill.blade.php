<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Your bill has been created please take a look</h4>
                <div>Name {{ $result['bill']['user']['name'] }}</div>
                <div>Phone number {{ $result['bill']['user']['phone_number'] }}</div>
                <div>Date created {{ $result['bill']['created_at'] }}</div>
                <div>Total $ {{ $result['bill']['total'] }}</div>
                <div>{{ $result['bill']['bill_status'] }}</div>
            </div>
        </div>
    </div>
</body>

</html>
