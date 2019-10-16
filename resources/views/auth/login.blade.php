@extends('layouts.app')

@section('content')

<body class="vertical-layout page-header-light vertical-menu-collapsible vertical-menu-nav-dark 1-column login-bg  blank-page blank-page" data-open="click" data-menu="vertical-menu-nav-dark" data-col="1-column">
    <div class="row">
        <div class="col s12">
            <div class="container">
                <div id="login-page" class="row">
                    <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
                        <form class="login-form " action="/post-login" method="POST">
                            @csrf

                            <div class="row">
                                <div class="input-field col s12">
                                    <h5 class="ml-4">MASUK KE DASHBOARD</h5>
                                </div>
                            </div>

                            @if(Session('alert'))
                            <div class="card-alert card red">
                                <div class="card-content white-text">
                                    <p>{{Session('alert')}}</p>
                                </div>
                                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                            @endif

                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-2">person_outline</i>
                                    <input id="emailUser" type="text" name="emailUser">
                                    <label for="emailUser" class="center-align">Alamat Email</label>

                                    @error('emailUser')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix pt-2">lock_outline</i>
                                    <input id="password" type="password" name="password">
                                    <label for="password">Password</label>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12"">
                                        Login
                                    </button>
                                </div>
                            </div>
                        <div class=" row">
                                        <div class="input-field col s12">
                                            <a href="/" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">BATAL</a>
                                        </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection