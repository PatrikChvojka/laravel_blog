<header class="post-header">
    <h2 class="mt-6 text-xl font-semibold text-gray-900">{{ $title }}</h2>
</header>

<div class="form-group">
    {!! Form::text('title', null, [
        'class' => 'form-control',
        'placeholder' => 'Nadpis článku'
        ]) !!}
</div>

<div class="form-group">
    <div>
    {!! Form::label('text', 'Text: ') !!}
    </div>
    <div>
    {!! Form::textarea('text', null, [
        'class' => 'form-control',
        'placeholder' => 'Popis článku'
        ]) !!}
        </div>
</div>

<div class="form-group">

    @foreach($tags as $tag)

    <label class="checkbox">

        {!! Form::checkbox('tags[], $tag-id') !!}
        {{ $tag->name }}

    </label>

    @endforeach
</div>

<div class="form-group">
    {!! Form::button('Uložiť článok', [
        'type' => 'submit',
        'class' => 'btn btn-light'
        ]) !!}
</div>

<span class="or">
    <a href="{{ url()->previous() }}" class="btn btn-light">Naspäť</a>
</span>

@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach 