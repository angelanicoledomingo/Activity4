

public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_name'); //varchar(255)
            $table->string('emplast_name');
            $table->string('emp_dept')
            $table->string('age')
            $table->timestamps();
        });
    }
