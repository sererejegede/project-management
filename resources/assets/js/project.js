/**
 * Created by Serere on 5/18/2018.
 */
if ( confirm('Are you sure you want to delete {{ $company->name }}? \n You can\'t revert this action!')){
    document.getElementById('company_delete').submit();
}