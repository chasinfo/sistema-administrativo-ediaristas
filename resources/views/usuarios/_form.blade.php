@csrf
<div class="card">
    <div class="card-body">
        <fieldset>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="input" required class="form-control" value="{{ old('name', $usuario->name ?? null) }}" name="name" id="name" placeholder="Informe o nome do usuário">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" required class="form-control" value="{{ old('email', $usuario->email ?? null) }}" name="email" id="email" placeholder="Informe o e-mail do usuário">
                    </div>
                </div>        
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" required class="form-control" value="{{ old('password', null) }}" name="password" id="password" placeholder="Informe a senha do usuário">
                    </div>
                </div>    
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password_confirmation">Confirmação da Senha</label>
                        <input type="password" required class="form-control" value="{{ old('password_confirmation', null) }}" name="password_confirmation" id="password_confirmation" placeholder="Informe a confirmação da senha do usuário">
                    </div>
                </div>    
            </div>
        </fieldset>
    </div>
    <div class="card-footer d-flex flex-row-reverse">
        <div class="p-2">
            <button type="submit" class="btn btn-block btn-primary">Salvar</button>
        </div>
        <div class="p-2">
            <a href="{{ route('usuarios.index') }}" class="btn btn-block btn-danger">Voltar</a>
        </div> 
    </div>
</div>