# ReduceBillingExecutionTimeUsingQueue

Note: this test was done using laravel.
Php is a single threaded language, so the nearest possible solution is to take advantage of Laravel Queue system.

technically, the number of excecution time can be reduced by running multiple jobs concurrently, by so doing if it takes 1.6s to process a request, while it takes 44 hours to process 10,000 customers' request,
multiple jobs could be created, whereby each job can be configured to run 10 request to bill 10 customers, if it takes 1.6s to process a request,
now it takes the same number of seconds to process about 100 requets.

Intalling this project.

kindly clone this repo.

i seeded 100 customer data for this approach.

i created an instance by using job to handle api calls; following the above description.

i pulled in guzzle to demonstrate api consumption. 

jobs created can be found in App/Jobs.


please note: this repo only demonstrate how the problem could be solved, it doesnt conatin any real life functionality.



