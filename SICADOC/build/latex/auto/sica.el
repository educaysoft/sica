(TeX-add-style-hook
 "sica"
 (lambda ()
   (TeX-add-to-alist 'LaTeX-provided-class-options
                     '(("sphinxmanual" "letterpaper" "10pt" "english")))
   (TeX-add-to-alist 'LaTeX-provided-package-options
                     '(("inputenc" "utf8") ("fontenc" "T1") ("fncychap" "Bjarne")))
   (add-to-list 'LaTeX-verbatim-macros-with-braces-local "href")
   (add-to-list 'LaTeX-verbatim-macros-with-braces-local "hyperref")
   (add-to-list 'LaTeX-verbatim-macros-with-braces-local "hyperimage")
   (add-to-list 'LaTeX-verbatim-macros-with-braces-local "hyperbaseurl")
   (add-to-list 'LaTeX-verbatim-macros-with-braces-local "nolinkurl")
   (add-to-list 'LaTeX-verbatim-macros-with-braces-local "url")
   (add-to-list 'LaTeX-verbatim-macros-with-braces-local "path")
   (add-to-list 'LaTeX-verbatim-macros-with-delims-local "path")
   (TeX-run-style-hooks
    "latex2e"
    "sphinxmanual"
    "sphinxmanual10"
    "inputenc"
    "cmap"
    "fontenc"
    "amsmath"
    "amssymb"
    "amstext"
    "babel"
    "times"
    "fncychap"
    "sphinx"
    "geometry"
    "hyperref"
    "hypcap"
    "sphinxmessages")
   (TeX-add-symbols
    "sphinxlogo"
    "sphinxdocclass"
    "sphinxpxdimen"
    "sphinxDUC"))
 :latex)

