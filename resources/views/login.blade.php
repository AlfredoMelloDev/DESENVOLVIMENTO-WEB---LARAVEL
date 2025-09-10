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
                            <form action="/loginSubmit" method="post">
                                {{-- Usamos o arroba csrf para formulários como segurança para inserção maliciosas de usuários não autenticados --}}
                                @csrf

                                <div class="mb-3">
                                    <label for="text_username" class="form-label">Usuário</label>
                                    <input type="text" class="form-control bg-dark text-info" name="text_username"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="text_password" class="form-label">Senha</label>
                                    <input type="password" class="form-control bg-dark text-info" name="text_password"
                                        required>
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

                </div>
            </div>
        </div>
    </div>
@endsection
