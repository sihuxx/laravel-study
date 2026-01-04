## ⚙️ Controller (컨트롤러) 

### (1) 컨트롤러란?
**"지휘자(중재자)"**
**파일 위치** - app/Http/Controllers/Controller.php
**역할** - 사용자의 요청(Request)을 받아 Model에게 데이터를 시키고, 받은 데이터를 View에게 전달하여 화면을 그리게 함

### (2) 핵심 역할
* **요청 처리:** 사용자가 보낸 데이터(검색어, 로그인 정보 등)를 받습니다.
* **로직 수행:** Model을 불러와 데이터를 조회하거나 저장합니다.
* **응답 반환:** 최종 결과를 View(HTML)나 JSON(API)으로 반환합니다.

### (3) 코드 예시

```php
class PostController extends Controller
{
    // 리스트 페이지 (GET /posts)
    public function index()
    {
        // 1. Model 호출: 최신순으로 모든 게시글 가져오기
        $posts = Post::latest()->get();

        // 2. View 반환: 'posts/index.blade.php'에 $posts 데이터 전달
        // compact('posts')는 ['posts' => $posts]와 같습니다.
        return view('posts.index', compact('posts'));
    }

    // 저장 로직 (POST /posts)
    public function store(Request $request)
    {
        // 1. 유효성 검사 (Validation)
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // 2. Model 호출: 데이터 저장
        Post::create($validated);

        // 3. 리다이렉트: 저장 후 목록 페이지로 이동
        return redirect()->route('posts.index');
    }
}
```

### (4) 자주 쓰는 메소드
#### 📥 요청 데이터 처리 (Request)
```php
$request->all()
```
폼에서 전송된 모든 데이터를 배열로 가져옵니다.

```php
$request->input('email')
```
특정 필드(email)의 값만 콕 집어서 가져옵니다.

```php
$request->validate([...])
```
데이터가 규칙에 맞는지 검사합니다. 틀리면 자동으로 에러 메시지와 함께 되돌려 보냅니다.

#### 📤 응답 반환 (Response)
```php
return view('폴더.파일명', $데이터)
```
사용자에게 HTML 화면을 보여줍니다.
`예: return view('posts.index', ['posts' => $posts]);`

```php
return response()->json($데이터)
```
데이터를 JSON 형식으로 반환합니다. (API 만들 때 사용)

#### ↩️ 페이지 이동 (Redirect)
```php
return redirect('/home')
```
특정 URL 주소로 강제로 이동시킵니다.

```php
return redirect()->route('posts.index')
```
**별칭(Name)**이 붙은 라우트로 이동시킵니다. (주소가 바뀌어도 코드 수정 불필요)

```php
return back()
```
방금 전 페이지로 되돌려 보냅니다.

#### 🚫 예외 처리
```php
abort(404)
```
강제로 "페이지를 찾을 수 없음" 에러 화면을 띄웁니다.