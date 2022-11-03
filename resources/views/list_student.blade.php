<a href="/uj-tanulo"><button>Új</button></a>

<form action="keres-tanulo" method="get">
    <input type="text" name="name">
    <button type="submit">keresés</button>
</form>

<form action="show-update-student" method="get">
    <input type="text" name="name">
    <button type="submit">Frissit</button>
</form>

<form action="delete-student" method="get">
    <input type="text" name="name">
    <button type="submit">Töröl</button>
</form>


<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Név</th>
        <th>Email</th>
        <th>Kurzus</th>
        <th>Ár</th>
      </tr>
    </thead>
    <tbody>
      @foreach( $students as $student )
         <tr>
           <td>{{ $student->id }}</td>
           <td>{{ $student->name }}</td>
           <td>{{ $student->email }}</td>
           <td>{{ $student->course->name}}</td>
           <td>{{ $student->course->price }}</td>
         </tr>
      @endforeach
    </tbody>
  </table>






  