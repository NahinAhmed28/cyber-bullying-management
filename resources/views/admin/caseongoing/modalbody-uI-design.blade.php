{{-- scripts are written in show.blade.php for  dynamically adding row for adding new member --}}
<form action="#" method="POST">
    {{ (app()->getLocale() == 'en') ? "Working Group Member:" : "ওয়ার্কিং গ্রুপ মেম্বারঃ" }}
    <div class="input-group">
        <input type="text" class="form-control" name="members[0]" placeholder="নতুন মেম্বার যোগ করুন 1" style="border: 1px solid #E1E8EE;">
        <div class="input-group-append">
            <button class="btn btn-secondary" type="button">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
    <div id="inputRows">
        <!-- Dynamically added input rows will go here -->
    </div>

    <button class="btn mt-2 w-100 text-bold" type="button" id="addMore" style="border: 1px solid #E1E8EE; color: #6E4798">
        <i class="ri-add-box-line"></i> {{__('admin.case.add_more_members')}}
    </button>
    <hr class="w-100" style="border: 1px solid #a4a3a3">
    পদক্ষেপ যোগ করুনঃ
    <div id="dynamicRows">
        <div class="row pt-1" id="row1">
            <div class="col-2 px-0">
                <input type="text" class="form-control" name="steps[0][title]" placeholder="পদক্ষেপ 1">
            </div>
            <div class="col-6 px-0">
                <input type="text" class="form-control" name="steps[0][description]" placeholder="আপনার পদক্ষেপ লিখুন">
            </div>
            <div class="col-4 px-0">
                <div class="dropdown w-100">
                    <button class="btn btn-outline-secondary dropdown-toggle w-100" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        পদক্ষেপ প্রয়োগকারী
                    </button>
                    <div class="dropdown-menu" aria-labelledby="stepsDropdown">
                        <a class="dropdown-item" href="#" data-value="1">প্রয়োগকারী 1</a>
                        <a class="dropdown-item" href="#" data-value="2">প্রয়োগকারী 2</a>
                        <a class="dropdown-item" href="#" data-value="3">প্রয়োগকারী 3</a>
                    </div>
                </div>
                <input type="hidden" name="steps[0][user]" value="1">
            </div>
        </div>
    </div>
    <button type="button" class="btn mt-2 w-100 text-bold" id="addRow" style="border: 1px solid #E1E8EE; color: #6E4798">
        <i class="ri-add-box-line"></i> {{__('admin.common.add_more_steps')}}
    </button>

    <button type="submit" class="btn btn-outline-success mt-2 w-100 text-bold" style="border: 1px solid #E1E8EE">
        {{__('admin.common.submit')}}
    </button>
</form>
