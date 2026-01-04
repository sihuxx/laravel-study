## 🖥️ View (뷰) 

### (1) 뷰란?
**"사용자에게 보여지는 화면"**
- **파일 위치** - resources/views/index.blade.php
- **역할** - Controller가 가공해서 넘겨준 데이터를 받아 HTML로 그려주는 역할, 라라벨은 **Blade(.blade.php)** 템플릿 엔진을 사용

### (2) 핵심 역할
* **데이터 출력:** 변수에 담긴 데이터를 화면에 표시
* **제어문 사용:** 반복문, 조건문 등을 사용해 동적인 화면을 구성
* **레이아웃 상속:** 헤더, 푸터 등 공통 부분을 재사용

### (3) 코드 예시

```php
<h1>{{ $user_name }}님의 게시글 목록</h1>

@if($posts->isEmpty())
    <p>게시글이 없습니다.</p>
@else
    <ul>
        @foreach($posts as $post)
            <li>
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->content }}</p>
                
                <a href="{{ route('posts.show', $post->id) }}">자세히 보기</a>
            </li>
        @endforeach
    </ul>
@endif
```

### (4) 주요 문법 
```php
{{ $data }}
<?php echo $data; ?>
// 같은 코드
```
기능적으로 동일한 코드

```php
@extends('layout')
```
전체 레이아웃 틀을 가져옴.

```php
@section('content')
```
레이아웃 내부에 들어갈 실제 내용을 정의함.