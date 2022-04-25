@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Register</div>
                  <div class="card-body">
  
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                      <form action="{{ route('register.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Name : <span class='text-danger h4'>*</span></label>
                              <div class="col-md-6">
                                  <input type="text" class="form-control" name="name" required autofocus>
                              </div>
                          </div>

                          <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">Mobile Number : <span class='text-danger h4'>*</span></label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="number" required>
                            </div>
                          </div>
                          
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address : <span class='text-danger h4'>*</span></label>
                              <div class="col-md-6">
                                  <input type="text" class="form-control" name="email" required autofocus>
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password : <span class='text-danger h4'>*</span></label>
                              <div class="col-md-6">
                                  <input type="password" class="form-control" name="password" required>
                              </div>
                          </div>
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">Register</button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection