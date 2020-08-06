@extends('layouts.appRegister')
@section('page_name','Register')

@section('content')

     <form class="form" method="POST" action="{{ route('register') }}">
      @csrf
                      <div class="form-group has-default">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">face</i>
                            </span>
                          </div>
                           <input placeholder="Name..." type="name" id="exampleEmail" required="true" aria-required="true" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>
                      <div class="form-group has-default">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">mail</i>
                            </span>
                          </div>
                          <input placeholder="E-mail..." type="email" id="exampleEmail" required="true" aria-required="true" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>
                      <div class="form-group has-default">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">lock_outline</i>
                            </span>
                          </div>
                        <input placeholder="Password..." type="password" id="examplePassword" required="true" aria-required="true" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>
                        <div class="form-group has-default">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">lock_open</i>
                            </span>
                          </div>
                        <input placeholder="Confirm Password..." type="password" id="examplePassword1" required="true" equalto="#examplePassword" aria-required="true" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                      </div>
                      <div class="form-check">
                        
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-round mt-4">Register</button>
                      </div>
                    </form>
@endsection
