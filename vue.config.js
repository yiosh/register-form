module.exports = {
  // devServer: {
  //   disableHostCheck: true
  // },
  publicPath:
    process.env.NODE_ENV === "production" ? "/v4/fl_app/registerForm/" : "/",
  indexPath: "index.php"
};
