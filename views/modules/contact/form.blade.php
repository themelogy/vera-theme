{!! Form::open(['route' => 'contact.send', 'class' => 'contact-form', 'method'=>'post']) !!}
    {!! Form::hidden('from', Request::path()) !!}

    @if (session()->has('contact_form_message'))
        <div class="alert alert-success">
            {!! session('contact_form_message') !!}
        </div>
    @endif

    @foreach (config('asgard.contact.config.fields') as $fieldName => $options)
        <div class="form-group af-inner{!! $errors->has($fieldName) ? ' has-error' : '' !!}">
            {!! Form::label($fieldName, trans('contact::contacts.form.'.$fieldName), [
                'class' => 'sr-only control-label contact-form-'.$fieldName.'-label'
            ]) !!}

            @if ($options['type'] == 'textarea')
                {!! Form::textarea($fieldName, old($fieldName), [
                    'class'       => 'form-control contact-form-'.$fieldName,
                    'placeholder' => trans('contact::contacts.form.'.$fieldName)
                ]) !!}
            @elseif ($options['type'] == 'select')
                {!! Form::select($fieldName, $options['choices'], old($fieldName), [
                    'class'       => 'form-control contact-form-'.$fieldName,
                    'placeholder' => trans('contact::contacts.form.'.$fieldName)
                ]) !!}
            @else
                {!! Form::text($fieldName, old($fieldName), [
                    'class'       => 'form-control contact-form-'.$fieldName,
                    'placeholder' => trans('contact::contacts.form.'.$fieldName)
                ]) !!}
            @endif

            @if ($errors->has($fieldName))
                <span class="help-block">{!! $errors->first($fieldName) !!}</span>
            @endif
        </div>
    @endforeach

    <div class="row">
        <div class="col-md-4 margin-left-0">
            {!! Form::submit(trans('contact::contacts.form.submit'), ['class' => 'form-button form-button-submit btn btn-theme btn-theme-dark', 'value'=>trans('contact::contacts.form.submit')]) !!}
        </div>
        <div class="col-md-8">
            <div class="form-group pull-right @if ($errors->has('g-recaptcha-response')) has-error @endif">
                {!! Captcha::display() !!}
                <span class="help-block"><small>{!! $errors->first('g-recaptcha-response') !!}</small></span>
            </div>
        </div>
    </div>

{!! Form::close() !!}

@push('js_inline')
{!! Captcha::script() !!}
@endpush
