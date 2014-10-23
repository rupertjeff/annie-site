<form name="contactForm" class="contact-form js-contact-form" ng-submit="submitForm()" ng-show="showForm">
	<p>Hello! My {{ Form::label('name', 'name', ['class' => 'label inline', 'ng-required' => true]) }} is {{ Form::text('name', null, ['ng-model' => 'name', 'placeholder' => 'My Name', 'ng-required' => true]) }} and I found you on AnnieDigital.com! My {{ Form::label('email', 'email', ['class' => 'label inline']) }} is {{ Form::email('email', null, ['ng-model' => 'email', 'placeholder' => 'my@email.com', 'ng-required' => true]) }}, and here’s {{ Form::label('comments', 'what I have to say', ['class' => 'label inline']) }}:</p>
	{{ Form::textarea('comments', null, ['ng-model' => 'comments', 'ng-required' => true]) }}
	<div class="actions">
		{{ Form::button('Send', ['name' => 'send', 'type' => 'submit', 'ng-disabled' => 'contactForm.$invalid']) }}
	</div>
</form>
<div class="response" ng-show=" ! showForm">Thanks for your message! I’ll get back to you as soon as I can.</div>
