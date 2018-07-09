@component('mail::message')
# 매드포라벨 회원가입을 진심으로 환영합니다!

매드포라벨에서 포스팅을 하시려면 아래 버튼을 통해 이메일을 인증해주세요!

@component('mail::button', ['url' => route('activate.code', $activation_code)])
인증하기
@endcomponent

감사합니다.<br>
{{ config('app.name') }}
@endcomponent
