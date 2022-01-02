    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class ApplyJobs extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('apply_jobs', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('job_vacancy_id');
                $table->unsignedBigInteger('company_id');
                $table->string('uid')->unique();
                $table->boolean('accepted')->default('0');
                $table->boolean('rejected')->default('0');
                $table->boolean('onwait')->default('1');
                $table->timestamps();

                $table->foreign('user_id')->references('user_id')->on('user_details')->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('job_vacancy_id')->references('id')->on('job_vacancies')->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('company_id')->references('id')->on('company_details')->onUpdate('cascade')->onDelete('cascade');

            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('apply_jobs');
        }
    }
