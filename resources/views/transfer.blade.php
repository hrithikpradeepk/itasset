@extends('theme')

@section('content')





<div class="col-xl-4 col-lg-5 col-md-7 " style="margin-left:450px" >
              <div class="card card-header" >
                <div class="card">
                  <h4 class="font-weight-bolder">Select Category</h4>
                
                </div>
                <div class="card card">
                <form class="row contact_form" action="/transfer1" method="post" novalidate="novalidate">
                {{csrf_field()}}
                <div class="input-group input-group-outline mb-3">
                  <div>
                      <label class="form-label">Category</label>
</div>
                    </div>

                    <div class="input-group input-group-outline mb-3">
                    <select name="category" id="category" onS class="form-control" >
                        @foreach($category as $category)
                        <option value="{{$category->id}}">{{$category->Categoryname }}</option>
                        @endforeach 
                        </select>
                    </div>

                  

                  
                    
                
                    <div class="text-center">
                      <button type="submit"  value="transfer" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Submit</button>
                    </div>
                  </form>
                </div>
               
</div>
<script type="text/javascript">
var category = new Array({{$categorycount}})
@if($categorycount==0)
category["empty"] = ["Select a category"];
@else
@foreach($category as $c)

category["{{$category->Categoryname}}"] = ["Canada", "United States", "Mexico"];
@endforeach
@endif
/* CountryChange() is called from the onchange event of a select element.
 * param selectObj - the select object which fired the on change event.
 */
function countryChange(selectObj) {
	// get the index of the selected option
	var idx = selectObj.selectedIndex;
	// get the value of the selected option
	var which = selectObj.options[idx].value;
	// use the selected option value to retrieve the list of items from the coutnryLists array
	cList = countryLists[which];
	// get the country select element via its known id
	var cSelect = document.getElementById("country");
	// remove the current options from the country select
	var len=cSelect.options.length;
	while (cSelect.options.length > 0) {
		cSelect.remove(0);
	}
	var newOption;
	// create new options
	for (var i=0; i<cList.length; i++) {
		newOption = document.createElement("option");
		newOption.value = cList[i];  // assumes option string and value are the same
		newOption.text=cList[i];
		// add the new option
		try {
			cSelect.add(newOption);  // this will fail in DOM browsers but is needed for IE
		}
		catch (e) {
			cSelect.appendChild(newOption);

		}
	}
}
//]]>
</script>
           