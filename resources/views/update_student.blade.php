
<form action="update-student" method="post">
    @csrf
    <p>
        <label for="">Név:</label>
        <input type="text" name="name" value="{{$student->name}}" >
    </p>
    <p>
        <label for="">Kurzus:</label>
        <input type="text" name="course" value="{{$student->course->name}}">
    </p>
    <p>
        <label for="">Email:</label>
        <input type="text" name="email" value="{{$student->email}}">
    </p>
    <p>
    <button type="submit">Frissités</button>
    </p>
</form>