@extends('layouts.app')

@section('content')
<h1>Criar Loja</h1>
<form action="{{route('admin.stores.store')}}" method="post">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="form-group">
    <label for="">Nome da loja</label>
    <input type="text" name="name" id="" class="form-control">
</div>
<div class="form-group">
    <label for="">Descrição</label>
    <input type="text" name="description" id="" class="form-control">
</div>
<div class="form-group">
    <label for="">Telefone</label>
    <input type="text" name="phone" id="" class="form-control">
</div>
<div class="form-group">
    <label for="">Celular/Whatsapp</label>
    <input type="text" name="mobile_phone" id="" class="form-control">
</div>
<div class="form-group">
    <label for="">Slug</label>
    <input type="text" name="slug" id="" class="form-control">
</div>
<div class="form-group">
    <label for="">Usuário</label>
    <select name="user">
        @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>

</div>
<div>
    <button type="submit" class="btn btn-lg btn-success">Criar loja</button>
</div>

</form>

@endsection
