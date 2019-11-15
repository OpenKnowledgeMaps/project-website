var getTooFewPapersHeuristic = function ( post_data ) {
    if ( !post_data ) return 'unknown';
    if( post_data.from && post_data.to ) {
        var fromDate = Date.parse( post_data.from );
        var toDate = Date.parse( post_data.to );
        var millisecondsInSixtyDays = 1000*60*60*24*60;
        if (toDate - fromDate <= millisecondsInSixtyDays) return 'shorttimedelta';
    }
    if( post_data.q ) {
        var tokens = post_data.q.split(' ')
        return tokens.length < 4 ? 'toospecific' : 'toomanytokens';
    }
    return 'unknown';
}