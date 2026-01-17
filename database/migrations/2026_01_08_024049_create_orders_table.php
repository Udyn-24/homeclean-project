public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('service_id')->constrained()->onDelete('cascade'); // Terhubung ke layanan apa
        $table->string('customer_name');
        $table->string('customer_email')->nullable();
        $table->string('customer_phone');
        $table->text('customer_address');
        $table->string('status')->default('pending'); // pending, confirmed, completed
        $table->timestamps();
    });
}