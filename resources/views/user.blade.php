<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <form class="form-horizontal" action="{{ route('user.store') }}" method="POST">
        {{-- <input id="customerId" name="id" placeholder="id" class="form-control input-md" required="" type="text"> --}}
        @csrf
        <input id="customerId" name="customerid" placeholder="Customer ID" class="form-control input-md" required="" type="text">
        <input id="name" name="name" placeholder="name" class="form-control input-md" required="" type="text">
        <input id="email" name="email" placeholder="email" class="form-control input-md" required="" type="text">
        <input id="password" name="password" placeholder="password" class="form-control input-md" required="" type="text">
        <button type="submit" class="btn btn-primary">Submit</button>


    </form>


</body>
</html>
