QUnit.test( "returns shorttimedelta error if timeframe is 60 or less days", function( assert ) {
    var post_data  = { from: '2019-01-01', to: '2019-01-02' }
    assert.strictEqual( getTooFewPapersHeuristic( post_data ), 'shorttimedelta' );
  });

  QUnit.test( "returns toomanytokens error if query string has 4 or more words", function( assert ) {
    var post_data  = { q: 'the quick brown fox jumped over the lazy dog' }
    assert.strictEqual( getTooFewPapersHeuristic( post_data ), 'toomanytokens' );
  });

  QUnit.test( "returns toospecific error if querystring has less than 4 words", function( assert ) {
    var post_data  = { q: 'the quick brown' }
    assert.strictEqual( getTooFewPapersHeuristic( post_data ), 'toospecific' );
  });