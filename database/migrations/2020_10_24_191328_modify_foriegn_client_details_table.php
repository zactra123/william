<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyForiegnClientDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_details', function (Blueprint $table) {
            $table->dropForeign('client_details_user_id_foreign');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
        Schema::table('client_attachment', function (Blueprint $table) {
            $table->dropForeign('client_attachment_user_id_foreign');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
        Schema::table('credentials', function (Blueprint $table) {
            $table->dropForeign('credentials_user_id_foreign');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
        Schema::table('credit_reports', function (Blueprint $table) {
            $table->dropForeign('credit_reports_user_id_foreign');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
        Schema::table('affiliates', function (Blueprint $table) {
            $table->dropForeign('affiliates_user_id_foreign');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
        Schema::table('upload_client_details', function (Blueprint $table) {
            $table->dropForeign('upload_client_details_user_id_foreign');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });

        Schema::table('admin_specifications', function (Blueprint $table) {
            $table->dropForeign('admin_specifications_user_id_foreign');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign('messages_user_id_foreign');
            $table->bigInteger('user_id')->nullable()->unsigned()->change();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('set null');
        });


        Schema::table('question_notes', function (Blueprint $table) {
            $table->dropForeign('question_notes_user_id_foreign');
            $table->bigInteger('user_id')->nullable()->unsigned()->change();
            $table->foreign('user_id')
                ->nullable()
                ->references('id')->on('users')
                ->onDelete('set null');
        });
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign('appointments_user_id_foreign');
            $table->bigInteger('user_id')->nullable()->unsigned()->change();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('set null');
        });
        Schema::table('message_histories', function (Blueprint $table) {
            $table->dropForeign('message_histories_user_id_foreign');
            $table->bigInteger('user_id')->nullable()->unsigned()->change();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('set null');
        });

        Schema::table('allowed_ips', function (Blueprint $table) {
            $table->dropForeign('allowed_ips_user_id_foreign');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });

        Schema::table('chat', function (Blueprint $table) {
            $table->dropForeign('chat_user_id_foreign');
            $table->bigInteger('user_id')->nullable()->change();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('set null');
        });

        Schema::table('client_reports', function (Blueprint $table) {
            $table->dropForeign('client_reports_user_id_foreign');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
        Schema::table('client_report_names', function (Blueprint $table) {
            $table->dropForeign('client_report_names_client_report_id_foreign');
            $table->foreign('client_report_id')
                ->references('id')->on('client_reports')
                ->onDelete('cascade');
        });
        Schema::table('client_report_phones', function (Blueprint $table) {
            $table->dropForeign('client_report_phones_client_report_id_foreign');
            $table->foreign('client_report_id')
                ->references('id')->on('client_reports')
                ->onDelete('cascade');
        });
        Schema::table('client_report_addresses', function (Blueprint $table) {
            $table->dropForeign('client_report_addresses_client_report_id_foreign');
            $table->foreign('client_report_id')
                ->references('id')->on('client_reports')
                ->onDelete('cascade');
        });
        Schema::table('client_report_employers', function (Blueprint $table) {
            $table->dropForeign('client_report_employers_client_report_id_foreign');
            $table->foreign('client_report_id')
                ->references('id')->on('client_reports')
                ->onDelete('cascade');
        });
        Schema::table('client_report_ex_public_records', function (Blueprint $table) {
            $table->dropForeign('client_report_ex_public_records_client_report_id_foreign');
            $table->foreign('client_report_id')
                ->references('id')->on('client_reports')
                ->onDelete('cascade');
        });
        Schema::table('client_report_ex_public_records', function (Blueprint $table) {
            $table->dropForeign('client_report_ex_public_records_client_report_id_foreign');
            $table->foreign('client_report_id')
                ->references('id')->on('client_reports')
                ->onDelete('cascade');
        });
        Schema::table('client_report_ex_accounts', function (Blueprint $table) {
            $table->dropForeign('client_report_ex_accounts_client_report_id_foreign');
            $table->foreign('client_report_id')
                ->references('id')->on('client_reports')
                ->onDelete('cascade');
        });
        Schema::table('client_report_ex_accounts_pay_states', function (Blueprint $table) {
            $table->dropForeign('ex_acc_id_ps');
            $table->foreign('client_report_ex_account_id', 'ex_acc_id_ps')
                ->references('id')->on('client_report_ex_accounts')
                ->onDelete('cascade');
        });
        Schema::table('client_report_ex_accounts_limit_high_balances', function (Blueprint $table) {
            $table->dropForeign('ex_acc_id_hb');
            $table->foreign('client_report_ex_account_id', 'ex_acc_id_hb')
                ->references('id')->on('client_report_ex_accounts')
                ->onDelete('cascade');
        });
        Schema::table('client_report_ex_accounts_balance_histories', function (Blueprint $table) {
            $table->dropForeign('ex_acc_id_bh');
            $table->foreign('client_report_ex_account_id', 'ex_acc_id_bh')
                ->references('id')->on('client_report_ex_accounts')
                ->onDelete('cascade');
        });
        Schema::table('client_report_ex_accounts_payment_histories', function (Blueprint $table) {
            $table->dropForeign('ex_acc_id_bh');
            $table->foreign('client_report_ex_account_id', 'ex_acc_id_ph')
                ->references('id')->on('client_report_ex_accounts')
                ->onDelete('cascade');
        });
        Schema::table('client_report_ex_inquiries', function (Blueprint $table) {
            $table->dropForeign('client_report_ex_inquiries_client_report_id_foreign');
            $table->foreign('client_report_id')
                ->references('id')->on('client_reports')
                ->onDelete('cascade');
        });
        Schema::table('client_report_ex_inquiries_dates', function (Blueprint $table) {
            $table->dropForeign('ex_inq_id_dates');
            $table->foreign('client_report_ex_inquiry_id', 'ex_inq_id_dates')
                ->references('id')->on('client_report_ex_inquiries')
                ->onDelete('cascade');
        });
        Schema::table('client_report_tu_public_records', function (Blueprint $table) {
            $table->dropForeign('client_report_tu_public_records_client_report_id_foreign');
            $table->foreign('client_report_id')
                ->references('id')->on('client_reports')
                ->onDelete('cascade');
        });
        Schema::table('client_report_tu_accounts', function (Blueprint $table) {
            $table->dropForeign('client_report_tu_accounts_client_report_id_foreign');
            $table->foreign('client_report_id')
                ->references('id')->on('client_reports')
                ->onDelete('cascade');
        });
        Schema::table('client_report_tu_accounts_payment_histories', function (Blueprint $table) {
            $table->dropForeign('cr_tu_acc_id_ah');
            $table->foreign('client_report_tu_account_id', 'cr_tu_acc_id_ah')
                ->references('id')->on('client_report_tu_accounts')
                ->onDelete('cascade');
        });
        Schema::table('client_report_tu_inquiries', function (Blueprint $table) {
            $table->dropForeign('client_report_tu_inquiries_client_report_id_foreign');
            $table->foreign('client_report_id')
                ->references('id')->on('client_reports')
                ->onDelete('cascade');
        });
        Schema::table('client_report_tu_summaries', function (Blueprint $table) {
            $table->dropForeign('client_report_tu_summaries_client_report_id_foreign');
            $table->foreign('client_report_id')
                ->references('id')->on('client_reports')
                ->onDelete('cascade');
        });
        Schema::table('client_report_ex_statements', function (Blueprint $table) {
            $table->dropForeign('client_report_ex_statements_client_report_id_foreign');
            $table->foreign('client_report_id')
                ->references('id')->on('client_reports')
                ->onDelete('cascade');
        });
        Schema::table('client_report_tu_statements', function (Blueprint $table) {
            $table->dropForeign('client_report_tu_statements_client_report_id_foreign');
            $table->foreign('client_report_id')
                ->references('id')->on('client_reports')
                ->onDelete('cascade');
        });
        Schema::table('client_report_eq_public_records', function (Blueprint $table) {
            $table->dropForeign('client_report_eq_public_records_client_report_id_foreign');
            $table->foreign('client_report_id')
                ->references('id')->on('client_reports')
                ->onDelete('cascade');
        });
        Schema::table('client_report_eq_inquiries', function (Blueprint $table) {
            $table->dropForeign('client_report_eq_inquiries_client_report_id_foreign');
            $table->foreign('client_report_id')
                ->references('id')->on('client_reports')
                ->onDelete('cascade');
        });
        Schema::table('client_report_eq_accounts', function (Blueprint $table) {
            $table->dropForeign('client_report_eq_accounts_client_report_id_foreign');
            $table->foreign('client_report_id')
                ->references('id')->on('client_reports')
                ->onDelete('cascade');
        });
        Schema::table('client_report_eq_accounts', function (Blueprint $table) {
            $table->dropForeign('client_report_eq_accounts_client_report_id_foreign');
            $table->foreign('client_report_id')
                ->references('id')->on('client_reports')
                ->onDelete('cascade');
        });
        Schema::table('client_report_eq_account_payment_histories', function (Blueprint $table) {
            $table->dropForeign('cr_tu_acc_id_ah');
            $table->foreign('cr_eq_acc_id_ah', 'cr_eq_acc_id_ah')
                ->references('id')->on('client_report_eq_accounts')
                ->onDelete('cascade');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
