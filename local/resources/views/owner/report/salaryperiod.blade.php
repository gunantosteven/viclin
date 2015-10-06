@extends('/owner/app')

@section('content')
<h1>Report Period Salary</h1>
<hr>
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Search Salary</h1>
        </div>
            {!! Form::open(['method' => 'POST', 'route'=>['owner.report.salaryperiod.store']]) !!}
            <div class="block-fluid"> 
                <div class="row-form clearfix">
                    <div class="span3">Month:</div>
                    <div class="span9">
                        <select name="bulan" id="s2_1month" style="width: 100%;">
                            <option value="JANUARY">JANUARY</option>
                            <option value="FEBRUARY">FEBRUARY</option>
                            <option value="MARCH">MARCH</option>
                            <option value="APRIL">APRIL</option>
                            <option value="MAY">MAY</option>
                            <option value="JUNE">JUNE</option>
                            <option value="JULY">JULY</option>
                            <option value="AUGUST">AUGUST</option>
                            <option value="SEPTEMBER">SEPTEMBER</option>
                            <option value="OCTOBER">OCTOBER</option>
                            <option value="NOVEMBER">NOVEMBER</option>
                            <option value="DECEMBER">DECEMBER</option>
                        </select>
                    </div>
                </div>
                <div class="row-form clearfix">
                    <div class="span3">Year:</div>
                    <div class="span9">
                        <select name="tahun" id="s2_1year" style="width: 100%;">
                            @for ($i = 2015; $i <= 2100; $i++)
                                <option value={{ $i }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="row-form clearfix">
	                <div class="span3">Employee:</div>
	                <div class="span9">
	                    <select name="idemp" id="s2_1employee" style="width: 100%;">
	                    	<option value="%">All</option>
	                        @foreach ($employees as $key => $item)
	                            <option value={{ $item['id'] }}>{{ $item['namaemp'] }}</option>
	                        @endforeach
	                    </select>
	                </div>
	            </div>
                <div class="row-form clearfix">
                    <input class="btn btn-primary" type="submit" value="Print" onclick="$('form').attr('target', '_blank');">
                </div>
            </div>
            {!! Form::close() !!}
    </div>
</div>
@endsection