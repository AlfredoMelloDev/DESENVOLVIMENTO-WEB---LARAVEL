{{-- Incluiremos o header nesta view usando o arroba extends o conteudo da view da pasta layout.main_layout , por que já estamos dentro da pasta view --}}
@extends('layouts.main_layout')

{{-- Vamos colocar este conteúdo do formulário dentro de uma section chamada conteudo e la view principla será retornado o conteudo deste arquivo usando o arroba yeld --}}
@section('conteudo')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-8">
                <div class="card p-5">

                    <!-- logo -->
                    <div class="text-center p-3">
                        <img src="assets/images/logo.png" alt="Notes logo">
                    </div>

                    <!-- form -->
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-12">

                            {{-- o path do action acionará a função de mandar os dados do formulário e acionará o controller  --}}
                            <form action="/loginSubmit" method="post" novalidate> {{-- Este novalidate desativa o required dos inputs --}}
                                {{-- Usamos o arroba csrf para formulários como segurança para inserção maliciosas de usuários não autenticados --}}
                                @csrf

                                <div class="mb-3">
                                    <label for="text_username" class="form-label">Usuário</label>
                                    <input type="email" class="form-control bg-dark text-info" name="text_username" value="{{ old('text_username')}}" required>  {{-- o Old mantém dados que foram inseridos certos --}}

                                    {{-- Aqui informaremos ao usuario erro relacionado ao campo usuario--}}
                                    @error('text_username')
                                        {{-- Variavel $message é padrão do framework --}}
                                        <div class="text-danger">{{ $message}}</div>
                                    @enderror
                                </div>

                                {{-- Campo de Senha --}}
                                <div class="mb-3">
                                    <label for="text_password" class="form-label">Senha</label>
                                    <input type="password" class="form-control bg-dark text-info" name="text_password" value="{{ old('text_password')}}" required> {{-- o Old mantém dados que foram inseridos certos --}}

                                    {{-- Variavel $message é padrão do framework --}}
                                    @error('text_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-secondary w-100">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- copy -->
                    <div class="text-center text-secondary mt-3">
                        <small>&copy; <?= date('Y') ?> Notes</small>
                    </div>

                    {{-- Apresentação de erros do formulário --}}
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul class="m-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
@endsection
