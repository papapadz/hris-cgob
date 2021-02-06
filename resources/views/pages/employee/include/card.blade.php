<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat');

* {
	box-sizing: border-box;
}

body {
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;

}

h3 {
	margin: 10px 0;
}

h6 {
	margin: 5px 0;
	text-transform: uppercase;
}

p {
	font-size: 14px;
	line-height: 21px;
}

.card-container {
	background-color: white;
	border-radius: 5px;
	box-shadow: 0px 10px 20px -10px rgba(0,0,0,0.75);
	padding-top: 30px;
	position: relative;
	max-width: 100%;
	text-align: center;
}

.card-container .round {
	border: 1px solid #03BFCB;
	border-radius: 50%;
	padding: 7px;
}

.skills {
    color: white;
	text-align: left;
	padding: 15px;
	margin-top: 30px;
}

.skills ul {
	list-style-type: none;
	margin: 0;
	padding: 0;
}

.skills ul li {
    border: 1px solid white;
	border-radius: 2px;
	display: inline-block;
	font-size: 12px;
	margin: 0 7px 7px 0;
	padding: 7px;
}

</style>

<div class="card-container">
	<img class="round" src="{{ $employee->image_url }}" height="75%" width="75%" />
    <h3>{{ $employee->emp_id }}</h3>
    <h6>{{ getEmployeeName($employee->emp_id) }}</h6>
	<p>{{ $employee->appointments->plantilla->position->position }}</p>
	<p>{{ $employee->appointments->department->department }}</p>
	{{-- <div class="buttons">
		<button class="primary">
			Message
		</button>
		<button class="primary ghost">
			Following
		</button>
	</div> --}}
	<div class="skills bg-primary">
		<h6>Skills</h6>
		<ul>
			<li>UI / UX</li>
			<li>Front End Development</li>
			<li>HTML</li>
			<li>CSS</li>
			<li>JavaScript</li>
			<li>React</li>
			<li>Node</li>
		</ul>
	</div>
</div>