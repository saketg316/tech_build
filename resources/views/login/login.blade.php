@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Login</div>
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
                      <form action="{{ route('login.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="" class="col-md-4 col-form-label text-md-right">E-Mail Address : <span class='text-danger h4'>*</span></label>
                              <div class="col-md-6">
                                  <input type="text" class="form-control" name="email" required autofocus>
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="" class="col-md-4 col-form-label text-md-right">Password : <span class='text-danger h4'>*</span></label>
                              <div class="col-md-6">
                                  <input type="password" class="form-control" name="password" required>
                              </div>
                          </div>
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">Login</button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection