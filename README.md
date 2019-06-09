# Madforavel
Modern PHP + Laravel Portfolio - CRUD, Login &amp; Reset Password, Register, Validation , Email Verification

---------------------------------------

## Secure Coding
* CSRF 토큰과 블레이드 탬플릿을 이용하여 XSS, CSRF 공격을 방어
* 쿼리빌더, Eloquent ORM 을 이용하여 SQL Injection 공격을 방어
* Validation 을 이용하여 회원가입 및 로그인시 유효성 검사를 통해 인젝션 공격을 방어
* 이메일 인증시 Hash 함수를 이용하여 이메일 인증 토큰을 암호화하였음
* 권한을 가진 유저가 아닌경우 글삭제 및 수정이 불가능하게 되었음
* SSH를 이용한 웹서버 원격 접속 및 Git CMD를 통해 프로젝트를 배포하였음

## Restful 리소스 컨트롤러
* 내장된 RESTful 리소스 컨트롤러를 이용하여 CRUD 구현
* 포스트와 유저에 해당하는 각 모델, 컨트롤러를 이용하여 MVC 구현

## MVC에서 V에 해당하는 View 의 부품화
* nav, footer 등 필요한 뷰 페이지를 모듈화 하여 inc 폴더에 보관, 부품화하였음
* 블레이드 템플릿을 이용하여 원하는 페이지에 부품에 해당하는 뷰 페이지를 삽입

## 반응형 웹 애플리케이션
* 부트스트랩을 이용하여 간단한 반응형 웹 애플리케이션을 제작
* Scss, Sass 및 웹팩을 통한 Laravel Mix를 사용하여 CSS를 커스텀 디자인 하였음

## 데이터베이스
* PHP 라이브러리인 Faker를 이용하여 Database Seeding을 수월하게 하였음.
* 쿼리빌더, Eloquent ORM을 이용하여 페이지네이션 및 CRUD를 구현하였음
* Migration을 이용한 데이터베이스 버젼관리기능

## AWS
* 아마존 웹서비스를 이용하여 웹서버, 데이터서버를 분리하였음.
* 아마존 EC2, RDS 이용.

## 기타 기능
* 라라벨 라이브러리 CK5 editor 를 사용하여 멋진 에디터를 이용한 글작성이 가능
* Mailgun API를 이용, 회원가입시 이메일 인증을 거쳐야만 로그인이 가능하게 하였

## P.S
* 가격 정책 관련하여 현재는 이메일 인증서비스를 이용하려면 관리자가 직접 이메일을 수동으로 승인해야 합니다.
  허용한 이메일만 인증이 가능하고, 아닌 경우에는 에러가 발생합니다.
  
  
------------
AWS 프리티어 만료
